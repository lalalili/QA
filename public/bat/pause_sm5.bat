@ECHO OFF
CLS
SCHTASKS /Change /S 10.0.6.206 /U administrator /P admin156* /TN "Auto_sm5" /DISABLE
SCHTASKS /Change /S 10.0.6.206 /U administrator /P admin156* /TN "Report_sm5" /DISABLE
Pause