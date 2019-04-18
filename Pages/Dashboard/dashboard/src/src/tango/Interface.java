package tango;

import java.io.IOException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashMap;
import java.util.Hashtable;
import java.util.List;
import java.util.Map;

import org.json.simple.JSONValue;

public class Interface {
	public static void main(String args[]) throws Exception, IOException {
		Hashtable<String, Integer> dataSetSizes = new Hashtable<String, Integer>();
		dataSetSizes.put("RO", 41773);
		dataSetSizes.put("HR", 54573);
		dataSetSizes.put("HU", 47538);
		if (args.length < 3) {
			throw new Exception("Invalid arguments. Expecting: tango.jar Country ID Mode Args");
		} else {
			Graph g = new Graph(dataSetSizes.get(args[0]), "data/" + args[0] + "_edges.csv",
					"data/" + args[0] + "_genres.json", "data/genreSimilarity.json");
			
			// ConcertBuddy mode
			if (args[2].equals("ConcertBuddy")) {
					List<String> genreStrList = Arrays.asList(args[3].split(", ")); 
					List<Genre> genreList = new ArrayList<Genre>();
					for (String s : genreStrList) {
						genreList.add(new Genre(s));
					}
					
				List L = g.searchClosest(Integer.parseInt(args[1]), genreList);
				Map output = new HashMap();
				output.put("concertBuddyID", L.get(0));
				output.put("path", L.get(1));
				System.out.println(JSONValue.toJSONString(Arrays.asList(output)));
			}
		}
	}
}
