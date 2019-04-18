package tango;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collections;
import java.util.Comparator;
import java.util.HashMap;
import java.util.HashSet;
import java.util.Hashtable;
import java.util.List;
import java.util.Map;
import java.util.Set;


import org.json.simple.JSONObject;
import org.json.simple.JSONValue;
import org.json.simple.parser.JSONParser;

public class Graph {
	private final int V; // number of vertices
	private int E; // number of edges
	private List<Integer>[] adj; // adjacency lists
	public List<Genre>[] likedGenres;

	public Graph(int V) {
		this.V = V;
		this.E = 0;
		adj = (List<Integer>[]) new List[V]; // Create array of adjacency lists.
		likedGenres = (List<Genre>[]) new List[V]; // Create array of liked genre lists.
		for (int v = 0; v < V; v++) // Initialize all lists
			adj[v] = new ArrayList<Integer>(); // to empty.
	}

	/**
	 * Creates a Graph when you give it the number of vertices, a file with all the
	 * edges, and a file of the genres.
	 * 
	 * @param V                   The number of vertices in the graph.
	 * @param edgesFile           A String representing the file with all the
	 *                            Graph's edges.
	 * @param genresFile          A String representing the file with all the
	 *                            Graph's users' liked genres.
	 * @param genreSimilarityFile A String representing the JSON file with the
	 *                            similarity indices between individual Genres.
	 */
	public Graph(int V, String edgesFile, String genresFile, String genreSimilarityFile) {
		this(V);
		this.readGenreInfo(genresFile);
		Genre.readGenreSimilarities(genreSimilarityFile);
		File file = new File(edgesFile);
		BufferedReader br;

		try {
			FileReader fr = new FileReader(file);
			br = new BufferedReader(fr);
			String line = br.readLine();

			// Skip first line (header info)
			line = br.readLine();
			while (line != null) {
				String[] contents = line.split(",");
				this.addEdge(Integer.parseInt(contents[0]), Integer.parseInt(contents[1]));
				line = br.readLine();
			}
		} catch (Exception e) {
			e.printStackTrace();
		}
	}

	/**
	 * Reads the liked genres for each user from a JSON file.
	 * 
	 * @param fileName A String representing the JSON file.
	 */
	private void readGenreInfo(String fileName) {
		try {
			// parsing file "JSONExample.json".
			Object obj = new JSONParser().parse(new FileReader(fileName));

			// typecasting obj to JSONObject.
			JSONObject jo = (JSONObject) obj;

			// Go through all vertices in the Graph.
			for (int i = 0; i < adj.length; i++) {
				// Read list of genres as ArrayList of String from file.
				ArrayList<String> strList = (ArrayList<String>) jo.get(String.valueOf(i));

				// Create new ArrayList of Genre.
				ArrayList<Genre> genreList = new ArrayList<Genre>();

				// Convert each String to Genre representation.
				for (String genreStr : strList) {
					genreList.add(new Genre(genreStr));
				}

				// Save genreList for vertex.
				this.likedGenres[i] = genreList;
			}

		} catch (Exception e) {
			e.printStackTrace();
		}
	}

	/**
	 * Returns a list of a given user's liked genres.
	 * 
	 * @param nodeID The integer that is the user's ID
	 * @return A list of the user's liked genres.
	 */
	
	/**
	 * Returns a list of a given user's liked genres.
	 * 
	 * @param nodeID The integer that is the user's ID
	 * @return A list of the user's liked genres.
	 */
	public List<Genre> genres(int nodeID) {
		return this.likedGenres[nodeID];
	}

	/**
	 * Returns the amount of vertices in the undirected graph
	 * 
	 * @return V the amount of vertices in the graph
	 */
	public int V() {
		return V;
	}

	/**
	 * Returns the amount of edges in the undirected graph
	 * 
	 * @return E the number of edges in the graph
	 */
	public int E() {
		return E;
	}

	/**
	 * Adds an undirected edge between two nodes into the graph
	 * 
	 * @param v A node whos edge is to be added
	 * @param w A node whos edge is to be added
	 */
	
	public void addEdge(int v, int w) {
		adj[v].add(w); // Add w to vâ€™s list.
		adj[w].add(v); // Add v to wâ€™s list.
		E++;
	}
	
	/**
	 * Returns the nodes adjacent to a given node
	 * 
	 * @param v The node who's adjacent nodes are to be returned
	 * @return A list of the user's liked genres.
	 */
	public List<Integer> adj(int v) {
		return adj[v];
	}

	/**
	 * Used to sort friends by how similar their liked genres are to the user.
	 * 
	 * @param user    A node integer of the user.
	 * @param friend1 A node integer of the first friend.
	 * @param friend2 A node integer of the second friend.
	 * @return An integer -1 if friend1's musical tastes are less similar to the
	 *         user's than friend2's; 0 if friend1's and friend2's musical tastes
	 *         are equally similar to the user's; 1 if friend2's musical tastes are
	 *         more similar to the user's than friend1's.
	 */
	public int compareUserAndFriends(int user, int friend1, int friend2) {
		// Compare the user's genres against both friends.
		if (Genre.similarityOfGenreLists(likedGenres[user], likedGenres[friend1]) < Genre
				.similarityOfGenreLists(likedGenres[user], likedGenres[friend2])) {
			return -1;
		} else if (Genre.similarityOfGenreLists(likedGenres[user], likedGenres[friend1]) > Genre
				.similarityOfGenreLists(likedGenres[user], likedGenres[friend2])) {
			return 1;

			// If both friends' tastes are equally similar to the user's return the friend
			// the shorter genre list.
		} else {
			if (likedGenres[friend1].size() < likedGenres[friend2].size()) {
				return 1;
			} else if (likedGenres[friend1].size() == likedGenres[friend2].size()) {
				return 0;
			} else {
				return -1;
			}
		}

	}

	/**
	 * Returns in ascending order how similar the genres of a user is to their friends
	 * 
	 * @param user The integer that is the user's ID
	 * @return Each friend of a user and percentage of how similar their liked genres are
	 */
	public List<Integer> sortByHowSimilar(int user) {
		List<Integer> friends = new ArrayList();
		friends.addAll(adj[user]);

		System.out.println("USER:");
		System.out.println(likedGenres[user]);
		System.out.println("----FRIENDS BEFORE SORT----");
		for (int i : friends) {
			System.out.println(i);
			System.out.println(likedGenres[i]);
		}

		friends.sort((friend1, friend2) -> compareUserAndFriends(user, friend1, friend2));

		System.out.println("----FRIENDS AFTER SORT----");
		for (int i : friends) {
			System.out.println(i);
			System.out.print(likedGenres[i]);
			System.out.println(Genre.similarityOfGenreLists(likedGenres[user], likedGenres[i])*100 + "%");
		}
		return friends;

	}

	class genrenum 
	{ 
	    double rollno; 
	    Genre name; 
	  
	    // Constructor 
	    public genrenum(double rollno, Genre name
	                               ) 
	    { 
	        this.rollno = rollno; 
	        this.name = name; 
	      
	    } 
	  
	    // Used to print student details in main() 
	    public String toString() 
	    { 
	        return this.rollno + " " + this.name;
	                         
	    } 
	} 
	  
	class Sortbyroll implements Comparator<genrenum> 
	{ 
	    // Used for sorting in ascending order of 
	    // roll number 
	    public int compare(genrenum a, genrenum b) 
	    { 
	        return (int) Math.round(a.rollno - b.rollno); 
	    } 
	} 
		public List<genrenum> sortByHowSimilarGenre(List<Integer> user, int n) {
		List<Genre> friends = new ArrayList();
		for (int i = 0; i < user.size() ; i++) {
			friends.addAll(likedGenres[user.get(i)]);
			System.out.println(likedGenres[user.get(i)]);
		}
		
		System.out.println("Genre to choose:");
		double num = 0;
		ArrayList<genrenum> ar = new ArrayList<genrenum>();
		for (int j = 0; j < friends.size(); j++){
		for (int i = 0; i < friends.size(); i++) {
			num = num + (Genre.howSimilars(friends.get(i), friends.get(j)));
		}
		ar.add(new genrenum(num, friends.get(j)));
		num = 0;
		}
		 ArrayList<genrenum> newList = new ArrayList<genrenum>(); 
		  
		 ArrayList<Genre> nn = new ArrayList<Genre>(); 
	        
		Collections.sort(ar, new Sortbyroll()); 
		Collections.reverse(ar); 
		
			for (int j = 0; j < ar.size(); j++) {
				
			
	            if (!(check(nn,ar.get(j).name))) { 
	           
	            	nn.add((ar.get(j)).name);
	            	newList.add(ar.get(j));
	            } 
	        
			}
		
		List<genrenum> rr = newList.subList(0, n);
		return (rr) ;
	}

	public Boolean check(ArrayList<Genre> nn, Genre n) {
		for (int i = 0; i < nn.size(); i++) {
			
			if (String.valueOf(n).equals(String.valueOf((nn.get(i))))) {
				
				return true;
			}
		}
		return false;
	}
	public int friendMostInCommon(int user) {
		List<Integer> sortedFriends = sortByHowSimilar(user);
		return sortedFriends.get(sortedFriends.size() - 1);
	}
	
	
	
	public List<genrenum> genreMostInCommon(List<Integer> user, int n) {
		List<genrenum> genre = sortByHowSimilarGenre( user, n);
		return genre;
	}

	/**
	 * Returns the closest person in the users friends network that likes a given genre
	 * 
	 * @param nodeID The integer that is the user's ID
	 * @return A closest user that likes the given genre
	 */
	public int searchClosest(int nodeID, Genre genre) throws GenreNotInCommonException {
		int s = nodeID;
		BreadthFirstPaths bfs = new BreadthFirstPaths(this, nodeID);
		int lowestDepth = this.V() + 1;
		int closestFriend = this.V() + 1;
		for (int v = 0; v < this.V() && v != nodeID; v++) { //Iterates through all vertices, excludes itself
			if (bfs.hasPathTo(v)) { //If a path to another node exists
				for (Genre a : this.genres(v)) {
					if (a.toString().contentEquals((genre.toString()))) { //Checks if the found user likes the given genre
						if (bfs.distTo(v) < lowestDepth) { //If the depth to the found user is less than the current, they become the closest friend

							closestFriend = v;
							lowestDepth = bfs.distTo(v);
						}
					}
				}
			}
		}
		//If the initialized value of closestFriend remains unchanged throw an exception
		if (closestFriend == this.V() + 1) {
	        throw new GenreNotInCommonException("No one in your friend circle likes this genre");

		}
		//Prints out every node in the path 
		for (int x : bfs.pathTo(closestFriend)) {
			if (x == s)
				System.out.print(x);
			else
				System.out.print("-" + x);
		}
		System.out.println();
        System.out.printf("The closest person in your friend network who likes %s is  %d", genre, closestFriend);
		System.out.println();
		//Returns the ID of the closest friend
		return closestFriend;

	}
	
	/**
	 * Returns the closest person in the users friends network that likes all the given genres
	 * 
	 * @param nodeID The integer that is the user's ID
	 * @return closestFriend The closest friend of the user that likes all the given genre
	 */
	public int searchClosest(int nodeID, List<Genre> genres) throws GenreNotInCommonException {
		int s = nodeID;
		
		//Adds every genre in the given list to a set 
		Set<String> genreSet = new HashSet<String>();
		for (Genre x : genres) {
			genreSet.add(x.toString());
		}
		BreadthFirstPaths bfs = new BreadthFirstPaths(this, nodeID);
		int lowestDepth = this.V() + 1;
		int closestFriend = this.V() + 1;
		
		//Iterates through all vertices, excludes itself
		for (int v = 0; v < this.V() && v != nodeID; v++) {
			if (bfs.hasPathTo(v)) {
				
				//Creates a set of liked genres for each connected node and compares it to the given genres
				Set<String> set1 = new HashSet<String>();
				for (Genre a : this.genres(v)) {
					if (genreSet.contains(a.toString())) {
						set1.add(a.toString());
					}
					//If a person likes all genres from the given list
					if (set1.containsAll(genreSet)) {
						if (bfs.distTo(v) < lowestDepth) {
							closestFriend = v;
							lowestDepth = bfs.distTo(v);
						}
					}
				}
			}
		}
		//If no other connected node likes the given genres throw exception
		if (closestFriend == this.V() + 1) {
			throw new GenreNotInCommonException("No one in your friend circle likes this genre");

		}
		for (int x : bfs.pathTo(closestFriend)) {
			if (x == s)
				System.out.print(x);
			else
				System.out.print("-" + x);
		}
		System.out.println();
		System.out.printf("The closest person in your friend network who likes these genres is  %d", closestFriend);
		System.out.println();
		return closestFriend;

	}
	
	
	public List<Integer> friendsWhoLike(int user, Genre g) {
		List<Integer> res = new ArrayList<Integer>();
		for (int f : adj(user)) {
			if (genres(f).contains(g)) {
				res.add(f);
			}
		}
		return res;
	}
	
	public List<Integer> friendsWhoLikeAll(int user, List<Genre> gs) {
		// Create duplicate of friends
		List<Integer> res = new ArrayList();
		res.addAll(adj(user));
		
		// Go through each genre
		for (Genre g : gs) {
			// Get the friends who like this genre
			List<Integer> friendsWhoLikeG = friendsWhoLike(user, g);
			
			// Take the intersection with remaining friends
			res.retainAll(friendsWhoLikeG);
		}
		
		// The final intersection will be the friends who like all genres
		return res;
	}
<<<<<<< HEAD
	
	public List<Integer> friendsWhoLikeAny(int user, List<Genre> gs) {
		Set<Integer> res = new HashSet<Integer>();
		
		// Go through each genre
		for (Genre g : gs) {
			// Get the friends who like this genre
			List<Integer> friendsWhoLikeG = friendsWhoLike(user, g);
			
			// Take the union
			res.addAll(friendsWhoLikeG);
		}
		
		// The final union will be the friends who like any genre
		return (List<Integer>) res.stream().collect(Collectors.toList());
	}
	
	/*
=======

>>>>>>> ac5dbb85bdc7192a254ba5edf43686727252b4aa
	public static void main(String args[]) throws GenreNotInCommonException, IOException {
		Graph g = new Graph(47538, "data/HU_edges.csv", "data/HU_genres.json", "data/genreSimilarity.json");

		System.out.println("Most similar: " + g.friendMostInCommon(2));
		List<Integer> sortedFriends = new ArrayList<Integer>(5);
		sortedFriends.add(4753);
		sortedFriends.add(4754);
		sortedFriends.add(4755);
		sortedFriends.add(4756);
		sortedFriends.add(4757);
		System.out.println("Most similar: " + g.genreMostInCommon(sortedFriends, 4));
		
		
	    Genre genre = new Genre("Dance");
		Genre genre1 = new Genre("Pop");
		Genre genre2 = new Genre("Folk");
		List<Genre> list = new ArrayList<Genre>();
		list.add(genre);
		list.add(genre1);
		list.add(genre2);
		g.searchClosest(20000, genre);
		System.out.println(" ");
		g.searchClosest(20000, list);
		

	    System.out.println(g.sortByHowSimilar(4));
	    System.out.println(g.adj(2));
<<<<<<< HEAD
	    System.out.println(g.friendsWhoLikeAny(2, Arrays.asList(new Genre("Pop"), new Genre("Rock"), new Genre("R&B"))));
	}*/
	
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
			
			/*
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
			}*/
			
			// SearchByGenres
			if (args[2].equals("SearchByGenres")) {
				List<String> genreStrList = Arrays.asList(args[4].split(", ")); 
				List<Genre> genreList = new ArrayList<Genre>();
				
				List<Integer> L = new ArrayList();
				if (args[3].equals("MatchAll")) {
					L = g.friendsWhoLikeAll(Integer.parseInt(args[1]), genreList);
				} else { 
					if (args[3].equals("MatchAny")) {
					L = g.friendsWhoLikeAny(Integer.parseInt(args[1]), genreList);
				}}
				
				List<Map> people = new ArrayList<Map>();
				for (int id : L) {
					Map person = new HashMap();
					person.put("person_id", String.valueOf(id));
					String genresString = g.genres(id).toString().substring(1, g.genres(id).toString().length() - 1);
					person.put("person_genre", genresString);
					people.add(person);
				}
				Map output = new HashMap();
				output.put("people", people);
				System.out.println(JSONValue.toJSONString(output));
			}
		}
	}
}
