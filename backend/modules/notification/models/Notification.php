<?php

namespace backend\modules\notification\models;

use backend\modules\content\models\Content;
use common\models\User;
use Yii;

/**
 * This is the model class for table "notification_notification".
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property Content $type
 * @property User $sender
 * @property User $receiver
 * @property string $created_at
 * @property string $updated_at
 */
class Notification extends \backend\db\Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notification_notification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'type'], 'required'],
            [['name', 'description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['sender', 'receiver', 'type'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Notification name',
            'description' => 'Notification description',
            'type' => 'type ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'sender' => 'Id Sender',
            'receiver' => 'Id Receiver'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSenderId()
    {
        return $this->hasOne(User::className(), ['id' => 'sender']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvertiseId()
    {
        return $this->hasOne(Content::className(), ['id' => 'type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceiverId()
    {
        return $this->hasOne(User::className(), ['id' => 'receiver']);
    }

    public function defaultExpand()
    {
        return ['senderId', 'receiverId', 'advertiseId'];

    }
}