package generador;

import java.io.*;

public class generador_videojuego {
	public static void main(String[] args) {

		FileWriter fichero = null;
		PrintWriter pw = null;

		try {

			fichero = new FileWriter("generador_videojuego.txt");
			pw = new PrintWriter(fichero);

			final String[] rating = { "TODOS", "3", "7", "12", "16", "18" };

			pw.println(
					"INSERT INTO `videojuegos` (`ID_VIDEOJUEGO`, `NOMBRE`, `COMPAÑIA`, `FECHA_LANZAMIENTO`, `N_JUGADORES`, `RATING`) \r\n"
							+ "VALUES ");
			for (int numero_juego = 1; numero_juego < 2001; numero_juego++) {
				pw.print("('" + numero_juego + "',");
				pw.print("'Nombre_Videojuego_" + numero_juego + "',");
				pw.print("'" + getRandom.getRandomIntBetweenRange(1, 50) + "',");
				pw.print("'" + getRandom.getRandomIntBetweenRange(1977, 2019) + "-"
						+ getRandom.getRandomIntBetweenRange(1, 12) + "-" + getRandom.getRandomIntBetweenRange(1, 28)
						+ "',");
				int njugadores = numero_juego % 6;
				pw.print("'" + njugadores + "',");
				pw.print("'" + rating[njugadores] + "'");
				pw.print(")");

				if (numero_juego == 2000) {
					pw.println(";");
				} else {
					pw.println(",");
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