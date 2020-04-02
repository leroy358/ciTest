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
                /*page-break-after: always;*/
                /*page-break-before: always;*/
            }
        }
        .preview-item {
            width: 96%;
            height: 297mm;
            position: relative;
            /*page-break-inside:avoid !important;*/
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
            height: 28px;
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
            left: 4px;
            width: 12px;
            background-color: white;
            border: 2px solid dodgerblue;
            /*z-index: 10;*/
        }
        .night-bp-column {
            right: 4px;
            width: 12px;
            background-color: dodgerblue;
            /*z-index: 10;*/
        }
        .bg-orange {
            background-color: #f5eee1;
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
    ?>
        <div class="preview-item">
            <div class="header">
                <span>早晚血压手账（期间：2018-08-21  ~  2019-8-20 ）</span>
                <span class="pat-name" style="float: right">姓名：xxxxx</span>
            </div>
            <div class="preview-item-body">
                <table border="2px;" style="border-collapse: collapse;text-align: center">
                    <tr class="bg-orange">
                        <td rowspan="3" colspan="2">日期（星期）</td>
                        <?php
                        for($col = 0; $col < 16; $col++) {
                            ?>
                            <td>2020-03-27</td>
                            <?php
                        }
                        ?>
                        <td rowspan="3"></td>
                    </tr>
                    <tr class="bg-orange">
                        <?php
                        for($col = 0; $col < 16; $col++) {
                            ?>
                            <td> 五 </td>
                            <?php
                        }
                        ?>
                    </tr>
                    <tr class="bg-orange">
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
                        <td colspan="2">血压<br>（mmHg）</td>
                        <?php
                        for($col = 0; $col < 16; $col++) {
                            ?>
                            <td class="relative-position" style="height: 100px;">
                                <div class="day-bp-column absolute-position" style="height: 60px; bottom: 0px;"></div>
                                <div class="night-bp-column absolute-position" style="height: 60px; bottom: 0px;"></div>
                            </td>
                            <?php
                        }
                        ?>
                        <td><span style="float: right; font-size: 10px; color: orange">（mmHg）</span></td>
                    </tr>
                    <tr class="bg-orange">
                        <td rowspan="4">早</td>
                        <td>测量时间</td>
                        <?php
                        for($col=0; $col<16; $col++){
                            ?>
                            <td>06:00</td>
                            <?php
                        }
                        ?>
                        <td>平均</td>
                    </tr>
                    <tr class="bg-orange">
                        <td>最高血压</td>
                        <?php
                        for($col=0; $col<16; $col++){
                            ?>
                            <td>115</td>
                            <?php
                        }
                        ?>
                        <td>115</td>
                    </tr>
                    <tr class="bg-orange">
                        <td>最低血压</td>
                        <?php
                        for($col=0; $col<16; $col++){
                            ?>
                            <td>65</td>
                            <?php
                        }
                        ?>
                        <td>65</td>
                    </tr>
                    <tr class="bg-orange">
                        <td>脉搏</td>
                        <?php
                        for($col=0; $col<16; $col++){
                            ?>
                            <td>70</td>
                            <?php
                        }
                        ?>
                        <td>70</td>
                    </tr>
                    <tr class="bg-orange">
                        <td rowspan="4">晚</td>
                        <td>测量时间</td>
                        <?php
                        for($col=0; $col<16; $col++){
                            ?>
                            <td>21:00</td>
                            <?php
                        }
                        ?>
                        <td>平均</td>
                    </tr>
                    <tr class="bg-orange">
                        <td>最高血压</td>
                        <?php
                        for($col=0; $col<16; $col++){
                            ?>
                            <td>115</td>
                            <?php
                        }
                        ?>
                        <td>115</td>
                    </tr>
                    <tr class="bg-orange">
                        <td>最低血压</td>
                        <?php
                        for($col=0; $col<16; $col++){
                            ?>
                            <td>65</td>
                            <?php
                        }
                        ?>
                        <td>65</td>
                    </tr>
                    <tr class="bg-orange">
                        <td>脉搏</td>
                        <?php
                        for($col=0; $col<16; $col++){
                            ?>
                            <td>75</td>
                            <?php
                        }
                        ?>
                        <td>75</td>
                    </tr>
                    <tr style="height: 72px">
                        <td colspan="2">服药次数（次）</td>
                        <?php
                        for($col=0; $col<16; $col++){
                            ?>
                            <td>2</td>
                            <?php
                        }
                        ?>
                        <td>2</td>
                    </tr>
                    <tr style="height: 240px">
                        <td colspan="2">备注（症状等）</td>
                        <?php
                        for($col=0; $col<16; $col++){
                            ?>
                            <td>xxxx</td>
                            <?php
                        }
                        ?>
                        <td></td>
                    </tr>

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
                    <span class="out-date">输出日期：2019-03-27</span>
                    <br>
                    <span class="pager">(1/1)</span>
                </div>
            </div>
<!--            <div class="page-view"></div>-->
        </div>



</div>
</body>
</html>