<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    const STATUS_EMAIL_NOT_VERIFIED = 5;
    

    const SCENARIO_UPDATE = 'update';
    const SCENARIO_CREATE = 'create';


    public $newPassword;
    public $passwordInput;
    public $password_repeat; 
    public $updatedPassword;
    public $plainPassword;
    public $existingPassword; // Add the existingPassword property

    public $email_verified;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }
    /**
     * Finds a user by their username or email.
     *
     * @param string $usernameOrEmail The username or email to search for.
     * @return User|null The User model, or null if not found.
     */

       public static function findByUsernameOrEmail($usernameOrEmail)
    {
        return static::find()
            ->where(['or', ['username' => $usernameOrEmail], ['email' => $usernameOrEmail]])
            ->one();
    }

    // common\models\User.php

    public static function getStatusOptions()
    {
        return [
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_INACTIVE => 'Inactive',
             self::STATUS_EMAIL_NOT_VERIFIED => 'Email Not Verified', // Status label for non-verified email accounts
        ];
    }

    public function getStatusLabel()
    {
        $statuses = self::getStatusOptions();
        return ArrayHelper::getValue($statuses, $this->status, 'Unknown');
    }

    public function updateStatus($status)
    {
        $this->status = $status;
        return $this->save(false); // Save without validating again
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // Other rules...
            [['username', 'email','fullName','address','contactNumber'], 'required'],
            ['status', 'default', 'value' => self::STATUS_EMAIL_NOT_VERIFIED],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_EMAIL_NOT_VERIFIED]],
            ['email', 'email'],
            ['email', 'unique'],
            ['username', 'unique'],
            ['newPassword', 'string', 'min' => 6],
            ['newPassword', 'validatePasswordComplexity'],
            ['password_repeat', 'compare', 'compareAttribute' => 'newPassword'],


            // Validation rules for the create scenario
            [['newPassword'], 'required', 'on' => self::SCENARIO_CREATE],

            // Validation rules for the update scenario
            ['existingPassword', 'validateExistingPassword', 'on' => self::SCENARIO_UPDATE],

            [['contactNumber'], 'integer'],
            [['contactNumber'], 'string', 'length' => [11, 11], 'on' => self::SCENARIO_CREATE],
        ];

    }


    public function scenarios()
    {
        $scenarios = parent::scenarios();

        // Include 'plainPassword' field only when it is not empty during update
        if ($this->scenario === self::SCENARIO_UPDATE && !empty($this->plainPassword)) {
            $scenarios[self::SCENARIO_UPDATE][] = 'plainPassword';
        }

        // Include 'existingPassword' field for both create and update scenarios
        $scenarios[self::SCENARIO_CREATE][] = 'existingPassword';
        $scenarios[self::SCENARIO_UPDATE][] = 'existingPassword';
        $scenarios[self::SCENARIO_CREATE][] = 'fullName';
        $scenarios[self::SCENARIO_CREATE][] = 'address';
        $scenarios[self::SCENARIO_CREATE][] = 'contactNumber';
        $scenarios[self::SCENARIO_UPDATE][] = 'fullName';
        $scenarios[self::SCENARIO_UPDATE][] = 'address';
        $scenarios[self::SCENARIO_UPDATE][] = 'contactNumber';

        return $scenarios;
    }

    // Custom validation method for existing password
    public function validateExistingPassword($attribute, $params)
    {
        if ($this->scenario === self::SCENARIO_UPDATE && !$this->verifyExistingPassword($this->$attribute)) {
            $this->addError($attribute, 'Existing password is incorrect.');
        }
    }


    public function verifyExistingPassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
        {
            return static::findOne(['username' => $username, 'status' => [self::STATUS_ACTIVE]]);
        }


    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }
    
        return static::findOne([
            'password_reset_token' => $token,
            'status' => [self::STATUS_ACTIVE ],
        ]);
    }
    
    public function validatePasswordComplexity($attribute, $params)
    {
        // Regular expression to check if the password contains special characters
        $specialCharacterRegex = '/[!@#$%^&*()\-_=+{};:,<.>]/';

        if (!empty($this->newPassword) && !preg_match($specialCharacterRegex, $this->$attribute)) {
            $this->addError($attribute, 'Password must contain special characters.');
        }
    }
    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token)
    {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_EMAIL_NOT_VERIFIED,
        ]);
    }

    public function removeEmailVerificationToken()
    {
        $this->verification_token = null;
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    public static function isPasswordResetTokenValid1($token)
    {
        if (empty($token)) {
            return false;
        }
    
        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = 600; // 10 minutes in seconds
        return $timestamp + $expire >= time();
    }
    

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for the current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Setter for the password property.
     * This method allows setting the password without reading its value.
     *
     * @param string $password The password to set.
     */
// Update the 'setPassword' method

// Setter for the password property.
// This method allows setting the password without reading its value.
public function setPassword($password)
{
    if ($this->scenario === self::SCENARIO_CREATE || !empty($this->newPassword)) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
}

    // getPassword method to return the new password for create scenario and hashed password for update scenario
    public function getPassword()
    {
        return $this->scenario === self::SCENARIO_CREATE ? '' : $this->password_hash;
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public static function findByEmail($email)
    {
        return static::findOne([
            'email' => $email,
            'status' => [self::STATUS_ACTIVE, self::STATUS_EMAIL_NOT_VERIFIED],
        ]);
    }


    public static function findIdentity($id)
{
    return static::findOne([
        'id' => $id,
        'status' => [self::STATUS_ACTIVE, self::STATUS_EMAIL_NOT_VERIFIED],
    ]);
}


    public function beforeSave($insert)
{
    if (parent::beforeSave($insert)) {
        // Check if 'newPassword' attribute is not empty and set the 'password_hash' attribute accordingly
        if (!empty($this->newPassword)) {
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->newPassword);
        }

        return true;
    }

    return false;
    }

}
