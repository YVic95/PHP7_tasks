<?php 
    if( !empty( $_POST ) ) {
        include "handler.php";
    }
?>
<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>Mail with attachment</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <table>
            <form enctype=multipart/form-data method="post">
            <tr>
                <td width='50%'>To:</td>
                <td text-align='right'>
                    <input type='text' name='mail_to' maxlength='32'>
                </td>
            </tr>
            <tr>
                <td width='50%'>Subject:</td>
                <td text-align='right'>
                    <input type='text' name='mail_subject' maxlength='64'>
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    Message:<br><textarea cols='56' rows='8' name='mail_msg'></textarea>
                </td>
            </tr>
            <tr>
                <td width='50%'>Image:</td>
                <td text-align='right'>
                    <input type='file' name='mail_file' maxlength='64'>
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <input type='submit' value='Send'>
                </td>
            </tr>
            </form>
        </table>
    </body>