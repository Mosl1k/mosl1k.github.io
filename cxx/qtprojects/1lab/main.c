#include <stdio.h>
#include <math.h>
#define A -5.0
#define B 5.0
#define H 0.1
/* функция F() вычисляет значение функции y = xxxxxxxx в точке x */
double F(double x)
{
return x * exp(x) + (2*sin(x)) - sqrt(abs((pow(x,3) - pow(x,2))));
}
int main( )
{
double x, y, sum;
int count;
sum = 0.0;
count = 0;
for(x = A; x <= B; x += H)
{
y = F(x);
//printf("%10.4f;%10.4f\n", x, y);
printf("%10.4f\n", y);
if (y<0)
{
count++;
sum += y;
}
}
count--;
printf("sred = %10.4f\n", sum/(count));
return 0;
}
