package tango;

import java.io.IOException;
import java.util.ArrayList;
import tango.UserID;


public class Listener {
	public UserID u;
	public ArrayList<Genre> likedGenres = new ArrayList();
	/**
	 * initializes listener
	 * 
	 * @param takes a genre array, and a user id
	 */
	public Listener(UserID u, Genre[] gs) {
		// set user id to u
		this.u = u;
		// add liked genres in gs
		for (Genre g : gs) {
			this.likedGenres.add(g);
		}
	}
	/**
	 * returns user id of listener
	 * 
	 * @return user id
	 */
	public UserID getUserID() {
		// return the user id
		return this.u;
	}
	
	/**
	 * Checks if listener likes a particular genre
	 * 
	 * @param takes a genre
	 * @return returns a boolean
	 */
	public boolean likesGenre(Genre g) {
		// return true if genre is contained in liked genres
		if (likedGenres.contains(g)) {
			return true;
		}
		// else return false
		else {
			return false;
		}
	}
	/**
	 * converts genre to a string
	 * 
	 * @return returns a string
	 */
	public String toGenreString() {
		String ans = "The user with ID " + this.u.toInt() + " likes the following genres: ";
		
		// for number of like genres
		for (int i = 0; i < this.likedGenres.size(); i++) {
			// conver to string
			if (i == 0) ans += this.likedGenres.get(i).toString();
			else ans += ", " + this.likedGenres.get(i).toString();
		}
		
		return ans + ".";
	}
	/**
	 * Checksif two listeners are equal
	 * 
	 * @param takes listener
	 * @return returns a boolean
	 */
	public boolean equals(Listener l) {
		// if the listener user id equals the user id return true
		if (this.u == l.getUserID())
			return true;
		// else return false
		else
			return false;
	}
	
	
	public static void main(String args[]) {
		// try in main
		// catch exception
		try {
			Genre[] gs = {new Genre("Pop"), new Genre("Rock")};
			Listener x = new Listener(new UserID("123"), gs);
					
			System.out.println(x.toString());
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}
}

class Friends {
	private Listener l;
	private ArrayList<UserID> friends = new ArrayList<UserID>();
	// take listenr and array of user id
	public Friends(Listener l, UserID[] us) {
		this.l = l;
		// add user id to this
		for (UserID u : us) {
			this.friends.add(u);
		}
	}
	// add friend takes listener 
	public void addFriend(Listener l) {
		// add to this.friedn the user id
		this.friends.add(l.u);
	}
	
	
}

