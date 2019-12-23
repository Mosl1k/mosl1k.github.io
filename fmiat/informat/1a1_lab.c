#include <stdio.h>
#include <math.h>
#define A -5.0
#define B 5.0
#define H 0.1
/* функция F() вычисляет значение функции y = sin(x)+x 2 в точке x */
double F(double x)
{
return x * exp(x) + (2*sin(x)) - sqrt(abs((pow(x,3) - pow(x,2)))); //sin(x) + x*x;
}
int main( )
{
double x, y, sum;
int count;
sum = 0.0;
count = 0;
for(x = A; x < 0.0; x += H)
{
y = F(x);
printf("%10.4f %10.4f\n", x, y);
if (y<0)// (y > x*x)
{
count++;
sum += y;
}
}
//if (count == 0)
//puts("count = 0");
printf("sred = %10.4f\n", sum/count);
return 0;
}
