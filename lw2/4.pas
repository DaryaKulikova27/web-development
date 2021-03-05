PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES
  DOS;

FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  Str, ParameterValue: STRING;
  Index, i: BYTE;
BEGIN
  Str := GetEnv('QUERY_STRING');
  Index := Pos(Key, Str) + Length(Key) + 1;
  i := Index;
  ParameterValue := '';
  WHILE (Str[i] <> '&') AND (i <= Length(Str))
  DO
    BEGIN
      ParameterValue := ParameterValue + Str[i];
      i := i + 1 
    END;
  GetQueryStringParameter := ParameterValue
END;

BEGIN {WorkWithQueryString}
  WRITELN;
  WRITELN('HTTP/1.1 200 OK');
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {WorkWithQueryString}

{http://localhost:4001/cgi-bin/4.cgi?first_name=dasha&age=18&last_name=kulikova}

