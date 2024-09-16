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
                                                            <?php
                                                            if ($item->sku >= 100 && $item->sku <= 105) {
                                                                ?>
                                                                <p>
                                                                    Congratulations on winning <?= $item->name_en; ?>! We are thrilled to inform you that you can now collect your prize from the <b>Anker Innovations Store</b> at <b>Mirdif City Centre</b>.
                                                                </p>
                                                                <br/>
                                                                <p>
                                                                    To make your visit smoother, you can find more details about the store here: <a href="https://www.citycentremirdif.com/en/find-a-store/anker-innovations">Anker Innovations Store - Mirdif City Centre</a>.
                                                                </p>
                                                                <br/>
                                                                <p>
                                                                    Alternatively, feel free to contact the store directly at <b>04 557 8381</b> if you need any further assistance.
                                                                </p>
                                                                <br/>
                                                                <p>
                                                                    Once again, congratulations, and we look forward to seeing you soon!
                                                                </p>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($item->sku >= 106 && $item->sku <= 108) {
                                                                ?>
                                                                <p>
                                                                    Congratulations on winning <?= $item->name_en; ?>! We are thrilled to inform you that you can now collect your prize from the <b>Anker Innovations Office</b> at <b>205, Block E, Dubai Silicon Oasis Headquarters</b>.
                                                                </p>
                                                                <br/>
                                                                <p>
                                                                    To make your visit smoother, you can find more details about the office here: <a href="https://g.co/kgs/kaVpDTG">Dubai Silcon Oasis Headquarters</a>
                                                                </p>
                                                                <br/>
                                                                <p>
                                                                    Alternatively, feel free to contact the office directly at <b>04 372 4670</b> if you need any further assistance.
                                                                </p>
                                                                <br/>
                                                                <p>
                                                                    Once again, congratulations, and we look forward to seeing you soon!
                                                                </p>
                                                                <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($item->sku >= 109) {
                                                                ?>
                                                                <p>
                                                                    Congratulations on winning a UFC 308 ticket! A member of <b>Anker Innovations</b> team will be in touch with you shortly to provide further instructions on how to access your tickets.
                                                                </p>
                                                                <br/>
                                                                <p>
                                                                    Once again, congratulations, and we hope you enjoy the event!
                                                                </p>
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