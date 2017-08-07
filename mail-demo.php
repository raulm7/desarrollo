<?php

    function mymail($to,$subject,$message,$headers)   {
        $cp = fsockopen ("mail.optelgt.com", 25, $errno, $errstr, 1);  $res=fgets($cp,256);
        fputs($cp, "HELO optelgt.com\n");  $res=fgets($cp,256);
        fputs($cp, "MAIL FROM: <info@optelgt.com>\n"); $res=fgets($cp,256);
        fputs($cp, "RCPT TO: <$to>\n"); $res=fgets($cp,256);
        fputs($cp, "DATA\n"); $res=fgets($cp,256);
        fputs($cp, "To: ".$to."\nFrom: info@optelgt.com\nSubject: ".$subject."\n".$headers."\n\n".$message."\n.\n"); $res=fgets($cp,256);
        fputs($cp,"QUIT\n"); $res=fgets($cp,256);
        return true;
    }

    if (mymail("rmelgar@optelgt.com",
                                "Titulo",
                                "<HTML><BODY>".
                                "<p>Cotntenido en html</p>".
                                "</BODY></HTML>",
                                "Content-Type: text/html;\r\n"
       )==true) {
          echo "Enviado";
       }


?>
