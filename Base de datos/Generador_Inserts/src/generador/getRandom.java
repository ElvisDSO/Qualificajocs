package generador;

public class getRandom {
	
	public static double getRandomIntegerBetweenRange(double min, double max) {
		double x = (Math.random() * ((max - min) + 1)) + min;
		return x;
	}
	
	public static int getRandomIntBetweenRange(double min, double max) {
		int x = (int) ((int) (Math.random() * ((max - min) + 1)) + min);
		return x;
	}

}
