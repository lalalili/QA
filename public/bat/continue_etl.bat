@ECHO OFF
CLS
SCHTASKS /Change /S 10.0.6.219 /U administrator /P admin156* /TN "Auto_etl" /ENABLE
SCHTASKS /Change /S 10.0.6.219 /U administrator /P admin156* /TN "Report_etl" /ENABLE
Pause