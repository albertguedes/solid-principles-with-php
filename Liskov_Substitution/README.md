## Liskov Substitution 

O princípio de substituição de Liskov estabelece que qualquer classe X derivada
de uma interface ou abstract Y, deve seguir todos os métodos definidos em Y e 
manter os mesmos tipos de saidas.

Isso é pra garantir que, se um programa que usa a classe X derivada de Y, e caso
seja necessário substituí-lo por uma classe uma classe X' derivada de Y, o 
programa vai continuar funcionando normalmente.
