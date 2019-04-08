package generador;

import java.io.*;

public class generador_usuario {
	public static void main(String[] args) {

		FileWriter fichero = null;
		PrintWriter pw = null;

		try {

			fichero = new FileWriter("generador_usuario.sql");
			pw = new PrintWriter(fichero);

			// final String[] rating = { "TODOS", "3", "7", "12", "16", "18" };

			pw.println(
					"INSERT INTO `usuario` (`ID_USUARIO`, `CONTRASEÑA`, `NOMBRE_USUARIO`, `APELLIDOS_USUARIO`, `EMAIL`) VALUES ");
			for (int numero_usuario = 1; numero_usuario < 501; numero_usuario++) {
				pw.print("('" + numero_usuario + "',");
				pw.print("'" + numero_usuario + "',");
				pw.print("'Nombre_Usuario_" + numero_usuario + "',");
				pw.print("'Apellido_Usuario_" + numero_usuario + "',");
				pw.print("'email_" + numero_usuario + "@email.com'");
				pw.print(")");

				if (numero_usuario == 500) {
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