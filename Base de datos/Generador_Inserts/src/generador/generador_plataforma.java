package generador;

import java.io.*;

public class generador_plataforma {
	public static void main(String[] args) {
		
		FileWriter fichero = null;
		PrintWriter pw = null;

		try {
			
			fichero = new FileWriter("generador_plataforma.sql");
			pw = new PrintWriter(fichero);
			
			pw.println("INSERT INTO `plataforma_videojuego` (`ID_VIDEOJUEGO`, `ID_PLATAFORMA`) VALUES ");

			for (int numero_juego = 1; numero_juego < 2001; numero_juego++) {
				int num = getRandom.getRandomIntBetweenRange(1, 5);
				int[] generos = new int[num];
				
				for (int i = 0; i < num; i++) {
					int a = getRandom.getRandomIntBetweenRange(1, 25);
					generos[i] = a;
				}
				
				for (int i = 0; i < generos.length; i++) {
					for (int j = 0; j < generos.length; j++) {
						if ((i != j && (generos[i] == generos[j]))) {
							generos[j] = generos[j] + 1;
						}
					}
				}
				
				for (int i = 0; i < num; i++) {
					pw.print("('" + numero_juego + "',");
					pw.print("'" + generos[i] + "')");
					if (numero_juego == 2000 && i == (num - 1)) {
						pw.println(";");
					} else {
						pw.println(",");
					}
				}
			}
			
		} catch (Exception ex) {
			ex.printStackTrace();
		} finally {
			try {
				if (null != fichero)
					fichero.close();
			} catch (Exception e2) {
				e2.printStackTrace();
			}
		}
	}
}