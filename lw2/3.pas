PROGRAM Greeting(INPUT, OUTPUT);
USES
  Dos;
VAR
  StrQuery, Name: STRING;
  Index, i: BYTE;
BEGIN
  WRITELN;
  StrQuery := GetEnv('QUERY_STRING');
  IF Pos('name', StrQuery) <> 0
  THEN
    BEGIN
      Index := Pos('name', StrQuery) + 5;
      Name := '';
      i := Index;
      WHILE i <= Length(StrQuery)
      DO
        BEGIN
          Name := Name + StrQuery[i];
          i := i + 1 
        END
    END
  ELSE
    Name := 'Anonymous';
  WRITELN('Hello, dear ', Name) 
END.
