@ECHO OFF
CLS
SCHTASKS /Change /S 10.0.6.206 /U administrator /P admin156* /TN "Auto_tm4" /ENABLE
SCHTASKS /Change /S 10.0.6.206 /U administrator /P admin156* /TN "Report_tm4" /ENABLE
Pause