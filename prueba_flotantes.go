package main

import "fmt"

func main() {
	fmt.Println("Prueba de punto flotante en Go.")

	n := 30

	norm := floatpt(n)
	fix32 := fixedpt32(n)
	fix64 := fixedpt64(n)

	fmt.Printf("Iteracion => Normal\t\t: Corregido 32 bits \t: Corregido 64 bits \n")
	for i := 0; i <= n; i++ {
		fmt.Printf("[ %d ] \t  => %f   \t: %f \t\t: %f \t\n", i, norm[i], fix32[i], fix64[i])
	}

	fmt.Println("La maxima presisión de punto flotante con Go es con 64 bits ")

}

func rec(y float32, z float32) float32 {
	return 108 - ((815 - (1500 / z)) / y)
}

func rec64(y float64, z float64) float64 {
	return 108 - ((815 - (1500 / z)) / y)
}

func floatpt(n int) []float32 {
	x := []float32{4, 4.25}
	xslice := x
	for i := 2; i <= n; i++ {
		val := rec(xslice[i-1], xslice[i-2])
		xslice = append(xslice, val)
	}
	return xslice
}

func fixedpt32(n int) []float32 {
	x := []float32{4, float32(17) / float32(4)}
	xslice := x
	for i := 2; i <= n; i++ {
		val := rec(xslice[i-1], xslice[i-2])
		xslice = append(xslice, val)
	}
	return xslice
}

func fixedpt64(n int) []float64 {
	x := []float64{4, float64(17) / float64(4)}
	xslice := x
	for i := 2; i <= n; i++ {
		val := rec64(xslice[i-1], xslice[i-2])
		xslice = append(xslice, val)
	}
	return xslice
}
