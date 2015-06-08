@ECHO OFF
CLS
SCHTASKS /Change /S 10.0.6.219 /U administrator /P admin156* /TN "Auto_best13" /ENABLE
SCHTASKS /Change /S 10.0.6.219 /U administrator /P admin156* /TN "Report_best13" /ENABLE
Pause