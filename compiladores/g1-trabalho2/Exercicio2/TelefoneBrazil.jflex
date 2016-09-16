import java.util.*;

%%
%class TelefoneBrazil
%standalone

N1 = [0-9]{8,9}
N2 = ((\+[5]{2}\-)?[0-9]{2}\-)?[0-9]{4}\-[0-9]{4}
N3 = ((\+[5]{2}\-)?[0-9]{2}\-)?[0-9]{3}\-[0-9]{3}\-[0-9]{3}

%%

^{N1}$ { System.out.print("TELEFONE N1:  " + yytext()); }
^{N2}$ { System.out.print("TELEFONE N2:  " + yytext()); }
^{N3}$ { System.out.print("TELEFONE N3:  " + yytext()); }
. {}
