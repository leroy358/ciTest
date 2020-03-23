<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <style>
        * {
            box-sizing: border-box;
        }
        #view {
            height: 100%;
            margin: auto;
            padding: 0;
            width: 210mm;
        }

        /*设置A4打印页面*/
        /*备注：由于@是否特殊符号，样式放在css文件中没问题。*/
        @preview-item {
            size: A4;
            margin: 0;
        }

        @media print {
            .preview-item {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
                page-break-before: always;
            }
        }
        .preview-item {
            width: 96%;
            height: 297mm;
            position: relative;
            page-break-inside:avoid !important;
        }

        .page-view {
            position: absolute;
            width: 100%;
            text-align: center;
            height: 60px;
            line-height: 60px;
            bottom: 0;
        }
        tr {
            height: 24px;
        }
        .border-orange {
            border-bottom: 1px dashed orange;
        }
        .border-dashed {
            border-bottom: 1px dashed lightgrey;
        }
        .relative-position {
            position: relative;
        }
        .absolute-position {
            position: absolute;
        }
        .day-bp-column {
            left: 10px;
            width: 10px;
            border: 2px solid dodgerblue;
        }
        .night-bp-column {
            right: 10px;
            width: 10px;
            background-color: dodgerblue;
        }
    </style>
</head>
<body>
    <div id="view">
        <?php
            $pat_name = 'xxxxxxxxxx';
            $week_array=array("日", "一", "二", "三", "四", "五", "六");
            $start_time = '2018-08-20';
            $end_time = '2019-08-19';
            $days = ceil((strtotime($end_time) - strtotime($start_time)) / 86400);
            $day_pages = ceil($days / 16);
            for ($page = 0; $page < $day_pages; $page++){
        ?>
            <div class="preview-item">
                <div class="header">
                    <span>早晚血压手账（期间：<?= $start_time ?> ~ <?= $end_time ?>）</span>
                    <span class="pat-name" style="float: right">姓名：<?= $pat_name ?></span>
                </div>
                <div class="preview-item-body">
                    <table border="2px;" style="border-collapse: collapse;text-align: center">
                        <tr>
                            <td rowspan="3">日期（星期）</td>
                            <?php
                                for($col = 0; $col < 16; $col++) {
                            ?>
                                    <td><?= date('m/d', strtotime($start_time) + $col * 86400) ?></td>
                            <?php
                                }
                            ?>
                            <td rowspan="3"></td>
                        </tr>
                        <tr>
                            <?php
                            for($col = 0; $col < 16; $col++) {
                                $this_day = date('w', strtotime($start_time) + $col * 86400)
                            ?>
                                <td><?= $week_array[$this_day] ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <?php
                            for($col = 0; $col < 16; $col++) {
                            ?>
                                <td>
                                    <span class="img-day" style="float: left">早</span>
                                    <span class="img-night" style="float: right">晚</span>
                                </td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td rowspan="8">血压<br>（mmHg）</td>
                            <?php
                            for($col = 0; $col < 16; $col++) {
                            ?>
                                <td class="border-dashed bp"></td>
                            <?php
                            }
                            ?>
                            <td rowspan="8"><span style="float: right; font-size: 10px; color: orange">（mmHg）</span></td>
<!--                            <td>血压<br>（mmHg）</td>-->
<!--                            <td>-->
<!--                                --><?php
//                                    for($col = 0; $col < 15; $col++) {
//                                    ?>
<!--                                    <td class="border-dashed bp"></td>-->
<!--                                --><?php
//                                }
//                                ?>
<!--                            </td>-->

<!--                            <td><span style="float: right; font-size: 10px; color: orange">（mmHg）</span></td>-->
                        </tr>
                        <?php
                        for($row = 0; $row < 7; $row++) {
                            $border_orange = FALSE;
                            $relative_position = FALSE;
                            if ($row == 0 || $row == 5) $border_orange = TRUE;
                            if ($row == 6) $relative_position = TRUE;
                        ?>
                            <tr class="<?= $border_orange? 'border-orange' : 'border-dashed' ?>">
                                <?php
                                for($col = 0; $col < 16; $col++) {
                                    if($row == 6){
                                ?>
                                        <td  class="<?= $relative_position? 'relative-position' : '' ?>">
                                            <div class="day-bp-column absolute-position" style="height: 65px; bottom: 80px;"></div>
                                            <div class="night-bp-column absolute-position" style="height: 60px; bottom: 65px;"></div>
                                        </td>
                                    <?php
                                    }
                                    else{
                                    ?>
                                        <td></td>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>

                    </table>
                </div>
                <div >
                    <div class="explain" style="float: left; width: 40%;font-size: 8px;">
                        給醫師
                        ※本圖表根據高血壓治療指南，只會顯示起床跟睡前的血壓值。
                        ※起床 會顯示4:00到11:59這段時間內，最早時間的10分鐘內3次測量的血壓/脈搏平均值。
                        ※睡前 會顯示19:00到1:59這段時間內，最晚時間的10分鐘內3次測量的血壓/脈搏平均值。
                        起床時、睡前10分鐘內若只有測量2次或1次時，只會顯示2次的平均值或測量1次的數值。
                    </div>
                    <div class="remark" style="float: right">
                        <span class="out-date">输出日期：2019-02-13</span>
                        <br>
                        <span class="pager">(<?= $page + 1 ?>/<?= $day_pages ?>)</span>
                    </div>
                </div>
                <div class="page-view"></div>
            </div>
        <?php
            }
        ?>
<!--    <div class="preview-item">-->
<!--        <div class="preview-item-body"></div>-->
<!--        <div class="page-view">2/3</div>-->
<!--    </div>-->
</div>
</body>
</html>