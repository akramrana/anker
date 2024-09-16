<?php

use yii\helpers\Html;

/** @var \yii\web\View $this view component instance */
/** @var \yii\mail\MessageInterface $message the message being composed */
/** @var string $content main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
        <meta http-equiv="Content-Security-Policy"
              content="script-src 'none'; connect-src 'none'; object-src 'none'; form-action 'none';" />
        <meta charset="UTF-8" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="x-apple-disable-message-reformatting" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta content="telephone=no" name="format-detection" />
        <title>Livelong</title>
        <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap" rel="stylesheet" />
        <link rel="shortcut icon" type="image/emailLogo.png" href="" />
        <style type="text/css">
            #outlook a {
                padding: 0;
            }

            .es-button {
                mso-style-priority: 100 !important;
                text-decoration: none !important;
            }

            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }

            .es-desk-hidden {
                display: none;
                float: left;
                overflow: hidden;
                width: 0;
                max-height: 0;
                line-height: 0;
                mso-hide: all;
            }

            .es-button-border:hover a.es-button,
            .es-button-border:hover button.es-button {
                background: #B8CFDD !important;
            }

            .es-button-border:hover {
                border-color: #42d159 #42d159 #42d159 #42d159 !important;
                background: #B8CFDD !important;
            }

            img {
                cursor: pointer;
            }

            img:hover {
                transform: scale(1.02);
                transition: 0.5s ease;
            }

            .welcome-head {
                margin: 0;
                line-height: 50px;
                mso-line-height-rule: exactly;
                font-family: 'Yeseva One',
                    Arial, sans-serif;
                font-size: 28px;
                font-weight: 600;
                font-style: normal;
                font-weight: normal;
                background-color: #ebe7ff;
                margin-bottom: 10px;
                margin-top: 20px;
                color: #580047;
            }

            @media screen and (max-width: 768px) {
                .welcome-head {
                    color: #580047;
                    font-size: 22px;
                }
            }

            @media only screen and (max-width: 600px) {
                .welcome-head {
                    color: #580047 !important;
                    font-size: 22px !important;
                }

                .es-content-body {
                    width: 100% !important;
                    border-radius: 0 !important;
                }

                /* Center the logo in mobile view */
                .es-m-p0r {
                    width: 100% !important;
                }

                p,
                ul li,
                ol li,
                a {
                    line-height: 150% !important;
                }

                h1,
                h2,
                h3,
                h1 a,
                h2 a,
                h3 a {
                    line-height: 120%;
                }

                h1 {
                    font-size: 50px !important;
                    text-align: center !important;
                }

                h2 {
                    font-size: 28px !important;
                    text-align: center !important;
                }

                h3 {
                    font-size: 20px !important;
                    text-align: center !important;
                }

                *[class="gmail-fix"] {
                    display: none !important;
                }

                .es-content table,
                .es-header table,
                .es-footer table,
                .es-content,
                .es-footer,
                .es-header {
                    width: 100% !important;
                    max-width: 600px !important;
                }

                .es-adapt-td {
                    display: block !important;
                    width: 100% !important;
                }

                .adapt-img {
                    width: 100% !important;
                    height: auto !important;
                }

                .es-m-p0 {
                    padding: 0 !important;
                }

                .es-m-p0r {
                    padding-right: 0 !important;
                }

                .es-m-p0l {
                    padding-left: 0 !important;
                }

                .es-m-p0t {
                    padding-top: 0 !important;
                }

                .es-m-p0b {
                    padding-bottom: 0 !important;
                }

                .es-m-p20b {
                    padding-bottom: 20px !important;
                }

                .es-mobile-hidden,
                .es-hidden {
                    display: none !important;
                }

                tr.es-desk-hidden,
                td.es-desk-hidden,
                table.es-desk-hidden {
                    width: auto !important;
                    overflow: visible !important;
                    float: none !important;
                    max-height: inherit !important;
                    line-height: inherit !important;
                }

                tr.es-desk-hidden {
                    display: table-row !important;
                }

                table.es-desk-hidden {
                    display: table !important;
                }

                td.es-desk-menu-hidden {
                    display: table-cell !important;
                }

                .es-menu td {
                    width: 1% !important;
                }

                table.es-table-not-adapt,
                .esd-block-html table {
                    width: auto !important;
                }

                table.es-social {
                    display: inline-block !important;
                }

                table.es-social td {
                    display: inline-block !important;
                }

                .es-desk-hidden {
                    display: table-row !important;
                    width: auto !important;
                    overflow: visible !important;
                    max-height: inherit !important;
                }

                .es-m-p5 {
                    padding: 5px !important;
                }

                .es-m-p5t {
                    padding-top: 5px !important;
                }

                .es-m-p5b {
                    padding-bottom: 5px !important;
                }

                .es-m-p5r {
                    padding-right: 5px !important;
                }

                .es-m-p5l {
                    padding-left: 5px !important;
                }

                .es-m-p10 {
                    padding: 10px !important;
                }

                .es-m-p10t {
                    padding-top: 10px !important;
                }

                .es-m-p10b {
                    padding-bottom: 10px !important;
                }

                .es-m-p10r {
                    padding-right: 10px !important;
                }

                .es-m-p10l {
                    padding-left: 10px !important;
                }

                .es-m-p15 {
                    padding: 15px !important;
                }

                .es-m-p15t {
                    padding-top: 15px !important;
                }

                .es-m-p15b {
                    padding-bottom: 15px !important;
                }

                .es-m-p15r {
                    padding-right: 15px !important;
                }

                .es-m-p15l {
                    padding-left: 15px !important;
                }

                .es-m-p20 {
                    padding: 20px !important;
                }

                .es-m-p20t {
                    padding-top: 20px !important;
                }

                .es-m-p20r {
                    padding-right: 20px !important;
                }

                .es-m-p20l {
                    padding-left: 20px !important;
                }

                .es-m-p25 {
                    padding: 25px !important;
                }

                .es-m-p25t {
                    padding-top: 25px !important;
                }

                .es-m-p25b {
                    padding-bottom: 25px !important;
                }

                .es-m-p25r {
                    padding-right: 25px !important;
                }

                .es-m-p25l {
                    padding-left: 25px !important;
                }

                .es-m-p30 {
                    padding: 30px !important;
                }

                .es-m-p30t {
                    padding-top: 30px !important;
                }

                .es-m-p30b {
                    padding-bottom: 30px !important;
                }

                .es-m-p30r {
                    padding-right: 30px !important;
                }

                .es-m-p30l {
                    padding-left: 30px !important;
                }

                .es-m-p35 {
                    padding: 35px !important;
                }

                .es-m-p35t {
                    padding-top: 35px !important;
                }

                .es-m-p35b {
                    padding-bottom: 35px !important;
                }

                .es-m-p35r {
                    padding-right: 35px !important;
                }

                .es-m-p35l {
                    padding-left: 35px !important;
                }

                .es-m-p40 {
                    padding: 40px !important;
                }

                .es-m-p40t {
                    padding-top: 40px !important;
                }

                .es-m-p40b {
                    padding-bottom: 40px !important;
                }

                .es-m-p40r {
                    padding-right: 40px !important;
                }

                .es-m-p40l {
                    padding-left: 40px !important;
                }
            }

            @media screen and (max-width: 384px) {
                .mail-message-content {
                    width: 414px !important;
                }
            }
        </style>
        <style>
            * {
                scrollbar-width: thin;
                scrollbar-color: #888 #f6f6f6;
            }

            ::-webkit-scrollbar {
                width: 10px;
                height: 10px;
            }

            ::-webkit-scrollbar-track {
                background: #f6f6f6;
            }

            ::-webkit-scrollbar-thumb {
                background: #888;
                border-radius: 6px;
                border: 2px solid #f6f6f6;
            }

            ::-webkit-scrollbar-thumb:hover {
                box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            }
        </style>
        <base href="#" />
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body style="
          width: 100%;
          font-family: arial, 'helvetica neue', helvetica, sans-serif;
          -webkit-text-size-adjust: 100%;
          -ms-text-size-adjust: 100%;
          padding: 0;
          margin: 0;
          ">
              <?php $this->beginBody() ?>
        <div dir="ltr" class="es-wrapper-color" lang="und" style="background-color: #ffffff">
            <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" role="none" style="
                   mso-table-lspace: 0pt;
                   mso-table-rspace: 0pt;
                   border-collapse: collapse;
                   border-spacing: 0px;
                   padding: 0;
                   margin: 0;
                   width: 100%;
                   height: 100%;
                   background-repeat: repeat;
                   background-position: center top;
                   background-color: #ffffff;
                   ">
                <tbody>
                    <tr>
                        <td valign="top" style="padding: 0; margin: 0">
                            <table cellpadding="0" cellspacing="0" class="es-content" align="center" role="none" style="
                                   mso-table-rspace: 0pt;
                                   border-collapse: collapse;
                                   border-spacing: 0px;
                                   table-layout: fixed !important;
                                   width: 100%;
                                   ">
                                <tbody>
                                    <tr>
                                        <td style="text-align: center; display: block; width: 100%; padding-top: 30px;">
                                            <a target="_blank" href="#" style=""><img
                                                    src="<?php echo \yii\helpers\Url::to('@web/images/Anker _Innovations_Square-01.png', true); ?>"
                                                    alt="" style="
                                                    border: 0;
                                                    outline: none;
                                                    text-decoration: none;
                                                    width:100px;
                                                    margin: 0 auto;" />
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?= $content ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
