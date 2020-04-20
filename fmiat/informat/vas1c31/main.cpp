#include <cmath>
#include <iostream>
#define H 0.1
#define A -5
#define B 5
using namespace std;

int main(int i, double a, int s, int t, int p,double g)
{
double x;
a = A;
i = a * 10;
t = exp(a) * (a)+2 * sin(a) - sqrt(abs((a) * (a) * (a)-(a) * (a)));
s = 1;
while ((i + 10) / 10 <= B)
{
x = exp(a) * (a)+2 * sin(a) - sqrt(abs((a) * (a) * (a)-(a) * (a)));
x = round(x * 10000) / 10000;
p = x;
if (t == p)
{
s=s+1;
}
if (t < p && p % 2 != 0)
{
t = p;
s = 1;
g = a;
}
if (i != 0)
{
cout « a « " " « x « "\n";
a += H;
i = a * 10;
x = 0;
}
else
{
cout « i « " 0" « endl;
i = 1;
a = H;
}
}
g = exp(g) * (g)+2 * sin(g) - sqrt(abs((g) * (g) * (g)-(g) * (g)));
cout « "Максимальное среди значений функции, имеющих нечетную целую часть" « g « " количество таких значений функции" « s;
}
