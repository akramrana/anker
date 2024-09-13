<table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="center">
            <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="display-width"
                   width="680">
                <tr>
                    <td align="center" bgcolor="#ffffff">
                        <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0"
                               class="display-width" width="600">
                            <tr>
                                <td align="center" style="border-bottom:1px solid #eeeeee;">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                           class="display-width" width="100%">
                                        <tr>
                                            <td align="left" class="MsoNormal"
                                                style="font-size:18px;font-weight:600;letter-spacing:1px;line-height:18px;text-transform:capitalize;">
                                                Dear <?php echo $model->first_name; ?> <?php echo $model->last_name; ?>,
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="20"></td>
                                        </tr>
                                        <tr>
                                            <td align="left">
                                                <table align="left" border="0" cellpadding="0" cellspacing="0"
                                                       class="display-width" width="100%">
                                                    <tr>
                                                        <td align="left" class="MsoNormal"
                                                            style="font-size:13px;line-height:24px;">
                                                            Thank you for being with <?php echo Yii::$app->params['appName'] ?> App. 

                                                            <b style="color: #000"> 
                                                                Your gift item <strong><u><?= $item->name_en; ?></u></strong> has been processed
                                                            </b>.
                                                            <br>

                                                            <?php
                                                            if ($item->is_store_pickup == 1) {
                                                                ?>
                                                                To collect your gift please you have to present in our store. 
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>