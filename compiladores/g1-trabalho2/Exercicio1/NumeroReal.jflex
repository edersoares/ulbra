import java.util.*;

%%
%class NumeroReal
%standalone

NUMBER = ([-+])?([0-9]+)(\.[0-9]+)?(E[+-]?[0-9]+)?

%%

^{NUMBER}$ { System.out.print("RECONHECI REAL " + yytext()); }
. {}
