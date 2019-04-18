package tango;

import java.io.*;
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.Arrays;

public class Reader {
	private static final String COMMA_DELIMITER = ",";

	// Student attributes index
	private static final int ID = 0;
	private static final int Friend = 1;
	
	public static List<List<List<UserID>>> readCSV(String s) throws IOException {
		List<List<List<UserID>>> array = new ArrayList<List<List<UserID>>>();
		String fileIn = s;
		String line = null;

		FileReader fileReader = new FileReader(fileIn);
		BufferedReader bufferedReader = new BufferedReader(fileReader);
		int counter = -1;
		List<UserID> isinit = new ArrayList<UserID>();
		List<UserID> addfrind = new ArrayList<UserID>();
		List<String> check = new ArrayList<String>();
		while ((line = bufferedReader.readLine()) != null) {
			
			if (counter == -1) {
				counter = counter;
			}
		
			
			else {
				String[] temp = line.split(COMMA_DELIMITER);
				String node11 = new String(temp[0]);

				UserID node1 = new UserID(temp[0]);
				UserID node2 = new UserID(temp[1]);
				
				if (check.indexOf(node11) != -1){
					//System.out.println( "yes"); 

					addfrind.add(node2);
					
					List<UserID> adder1 = new ArrayList<UserID>();
					adder1.add(0, node1);
					
					List<List<UserID>> are = new ArrayList<List<UserID>>();
					are.add(0, adder1);
					are.add(1, addfrind);
					counter--;
					array.set(counter,are);
					System.out.println( array ); 
					//counter ++;
					//System.out.println( check); 

				}
			
			
			else {
				addfrind.clear();
				//System.out.println( check); 

				addfrind.add(0,node2);
			List<UserID> adder = new ArrayList<UserID>();
			adder.add(0, node2);

			List<UserID> adder1 = new ArrayList<UserID>();
			adder1.add(0, node1);
			isinit.add(node1);
			check.add(node11);
			
			
			List<List<UserID>> are = new ArrayList<List<UserID>>();

			are.add(0, adder1);
			are.add(1, adder);
			
			array.add(counter,are);
			}
			
			
			
			
		}
			counter++;

			
	}
		bufferedReader.close();
		//System.out.println( array); 

		return array;

	}

	public static List<Object> readJSON(String s) throws IOException {
		List<Object> array = new ArrayList<>();
	String fileIn = s;
	String line = null;

	FileReader fileReader = new FileReader(fileIn);
	BufferedReader bufferedReader = new BufferedReader(fileReader);
	int counter = -1;
	List<UserID> isinit = new ArrayList<UserID>();
	List<Genre> addfrind = new ArrayList<Genre>();
	List<String> check = new ArrayList<String>();
	while ((line = bufferedReader.readLine()) != null) {
		
		if (counter == -1) {
			counter = counter;
		}
	
		
		else {
			String[] temp = line.split(COMMA_DELIMITER);
			String node11 = new String(temp[0]);

			UserID node1 = new UserID(temp[0]);
			Genre node2 = new Genre(temp[1]);
			
			if (check.indexOf(node11) != -1){
				//System.out.println( "yes"); 

				addfrind.add(node2);
				
				List<UserID> adder1 = new ArrayList<UserID>();
				adder1.add(0, node1);
				
				List<Object> are = new ArrayList<>();
				are.add(0, adder1);
				are.add(1, addfrind);
				counter--;
				array.set(counter,are);
				System.out.println( array ); 
				//counter ++;
				//System.out.println( check); 

			}
		
		
		else {
			addfrind.clear();
			//System.out.println( check); 

			addfrind.add(0,node2);
		List<Genre> adder = new ArrayList<Genre>();
		adder.add(0, node2);

		List<UserID> adder1 = new ArrayList<UserID>();
		adder1.add(0, node1);
		isinit.add(node1);
		check.add(node11);
		
		
		List<Object> are = new ArrayList<>();

		are.add(0, adder1);
		are.add(1, adder);
		
		array.add(counter,are);
		}
		
		
		
		
	}
		counter++;

		
}
	bufferedReader.close();
	//System.out.println( array); 

	return array;

}

	public static void main(String[] args) throws IOException {
		readCSV("data/ur a curva.csv");
	}
}
