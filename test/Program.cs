using System;
using System.Collections.Generic;
using System.Linq;

namespace test
{
    class Program
    {
        static void Main(string[] args)
        {
            // Console.WriteLine("Hello World!");

            int N = 50;
            var lst = floatpt(N);
            var lst2 = fixedpt(N);

            for (int i = 0; i < N; i++)
            {
                Console.WriteLine("[{0}]: {1} | {2} ", i, lst[i], lst2[i]);
            }

        }

        static double rec(double y, double z)
        {
            double salida = 108 - ((815 - (1500 / z)) / y);
            return salida;
        }

        static decimal rec(decimal y, decimal z)
        {
            decimal salida = 108 - ((815 - (1500 / z)) / y);
            return salida;
        }

        static List<double> floatpt(int N)
        {
            List<double> x = new List<double> { 4, 4.25 };

            for (var i = 2; i <= N; i++)
            {
                var r = rec(x[i - 1], x[i - 2]);
                x.Add(r);
            }

            return x;
        }

        static List<decimal> fixedpt(int N)
        {
            List<decimal> x = new List<decimal> { (decimal)4, (decimal)17 / (decimal)4 };

            for (var i = 2; i <= N; i++)
            {
                var r = rec(x[i - 1], x[i - 2]);
                x.Add(r);
            }

            return x;
        }
    }
}
