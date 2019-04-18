package tango;
import java.io.*;

public class test {
	//uses api to check the similarity score between to genres
	public static void main(String[] args) {
		try {
			// takes string
			String s = null; 
			// calls python file 
			Process p  = Runtime.getRuntime().exec("/Users/christinamudarth/Desktop/test.py");
			BufferedReader in = new BufferedReader(new InputStreamReader(p.getInputStream()));
			while ((s= in.readLine()) != null ) {
				System.out.println(s);
			}
		}
		catch (IOException ie) {
			ie.printStackTrace();
		}
	}
}
