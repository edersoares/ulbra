import java.util.*;

%%
%class Cripto
%standalone

%{
    private String criptografar(String s) {

        int tam;
        char ch;
        String aux;

        aux = s.substring(8);
        tam = aux.length() - 1;
        aux = "";

        for (int i = 8; i < tam; i++) {

            ch = s.charAt(i);

            if (ch >= 'a' && ch < 'z')
                ch++;
            else if (ch == 'z')
                ch = 'a';
            else if (ch > 'A' && ch < 'Z')
                ch++;
            else if (ch == 'Z')
                ch = 'A';

            aux = aux + ch;
        }

        return "<CRIPTO>" + aux.toUpperCase() + "</CRIPTO>";
    }
%}



%%

"<CRYPTO>".*"</CRYPTO>" { System.out.print(criptografar(yytext())); }
. { System.out.print(yytext()); }
