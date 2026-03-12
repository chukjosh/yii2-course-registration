<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registrations".
 *
 * @property int $id
 * @property int $student_id
 * @property int $course_id
 * @property string $registration_date
 *
 * @property User $user
 * @property Course $course
 */
class Registration extends \yii\db\ActiveRecord
{
    // Other model code...

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(User::className(), ['id' => 'student_id']);
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }
}
