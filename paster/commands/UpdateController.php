<?php

namespace app\commands;

use app\models\Past;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * Класс для обновления записей в БД
 * Используя cron можем запускать нужную нам процедуру с заданной периодичностью
 */
class UpdateController extends Controller
{
    /**
     * @var string[]
     */
    public array $intervalList = [
        Past::NO_TIME_LIMIT => "P0100-00-00T00:00:00",
        Past::TIME_LIMIT_10_MIN => "P0000-00-00T00:10:00",
        Past::TIME_LIMIT_1_HOUR => "P0000-00-00T01:00:00",
        Past::TIME_LIMIT_3_HOUR => "P0000-00-00T03:00:00",
        Past::TIME_LIMIT_DAY => "P0000-00-01T00:00:00",
        Past::TIME_LIMIT_WEEK => "P0000-00-07T00:00:00",
        Past::TIME_LIMIT_MONTH =>  "P0000-01-00T00:00:00",
    ];

    /**
     * На сервере установим запуск этой команды раз в секунду (к примеру)
     * Ищем активные записи и сравниваем их временные метки с текщим временем
     * @return int Exit code
     */
    public function actionUpdateActiveStatus()
    {
        $pasts = Past::find()->where(['is_active' => TRUE])->andWhere(['<>', 'expiration_time', Past::NO_TIME_LIMIT])->all();

        foreach ($pasts as $element) {
            $dateTimeElement = new \DateTime($element->create_at);
            $dateTimeElement->add(new \DateInterval($this->intervalList[$element->expiration_time]));
            $dateTimeNow = new \DateTime();

            if ($dateTimeElement < $dateTimeNow) {
                $element->is_active = false;
                $element->save();
            }
        }

        return ExitCode::OK;
    }
}
