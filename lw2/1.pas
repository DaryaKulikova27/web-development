PROGRAM PrintHeaderValues(INPUT, OUTPUT);
USES 
  Dos;
BEGIN {PrintHeaderValues}                  
  WRITELN;
  WRITELN('HTTP/1.1 200 OK');
  WRITELN('Request-Method: ', GetEnv('REQUEST_METHOD'));
  WRITELN('Query string: ', GetEnv('QUERY_STRING'));
  WRITELN('Content-Length: ', GetEnv('CONTENT_LENGTH'));
  WRITELN('HTTP_USER_AGENT: ', GetEnv('HTTP_USER_AGENT'));
  WRITELN('HTTP_HOST: ', GetEnv('HTTP_HOST'));
  WRITELN
END.{PrintHeaderValues}

