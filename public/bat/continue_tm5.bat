@ECHO OFF
CLS
SCHTASKS /Change /S 10.0.6.206 /U administrator /P admin156* /TN "Auto_tm5" /ENABLE
SCHTASKS /Change /S 10.0.6.206 /U administrator /P admin156* /TN "Report_tm5" /ENABLE
Pause