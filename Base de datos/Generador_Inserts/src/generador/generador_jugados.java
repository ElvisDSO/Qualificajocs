package generador;

import java.io.*;

public class generador_jugados {
	public static void main(String[] args) {

		FileWriter fichero = null;
		PrintWriter pw = null;
		final int NUM_JUEGOS_POR_JUGADOR = 20;

		try {

			fichero = new FileWriter("generador_jugados.sql");
			pw = new PrintWriter(fichero);

			// final String[] rating = { "TODOS", "3", "7", "12", "16", "18" };

			pw.println("INSERT INTO `lista_jugados` (`ID_VIDEOJUEGO`, `ID_USUARIO`, `VALORACION`) VALUES ");
			int contador = 1;
			int id_jugador = 1;

			for (int i = 1; i <= NUM_JUEGOS_POR_JUGADOR; i++) {
				int[] juegos = new int[NUM_JUEGOS_POR_JUGADOR];

				for (int j = 0; j < NUM_JUEGOS_POR_JUGADOR; j++) {
					int a = getRandom.getRandomIntBetweenRange(1, 2000);
					juegos[j] = a;
				}

				for (int m = 0; m < juegos.length; m++) {
					for (int n = 0; n < juegos.length; n++) {
						if ((m != n && (juegos[m] == juegos[n]))) {
							juegos[m] = juegos[m] + 1;
						}
					}
				}

				for (int k = 0; k < juegos.length; k++) {
					pw.print("('" + juegos[k] + "',");
					pw.print("'" + id_jugador + "',");
					pw.print("'" + getRandom.getRandomIntBetweenRange(0, 10) + "'");
					pw.print(")");
					if (i == NUM_JUEGOS_POR_JUGADOR && contador == NUM_JUEGOS_POR_JUGADOR) {
						pw.println(";");
					} else {
						pw.println(",");
					}
					if (contador < NUM_JUEGOS_POR_JUGADOR) {
						contador++;
					} else {
						id_jugador++;
						contador = 1;
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