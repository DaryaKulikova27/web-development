PROGRAM SarahRevere(INPUT, OUTPUT);
USES
  Dos;
VAR
  Lanterns: STRING;
BEGIN
  WRITELN;
  WRITELN('HTTP/1.1 200 OK');
  Lanterns := GetEnv('QUERY_STRING');
  IF Lanterns = 'lanterns=1'
  THEN
    WRITELN('By board')
  ELSE
    IF Lanterns = 'lanterns=2'
    THEN
      WRITELN('By sea')
    ELSE
      WRITELN('I dont know')   
END.
