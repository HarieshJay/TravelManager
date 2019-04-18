package tango;

import tango.UserID;
import tango.Friends;
import tango.Listener;

import java.io.IOException;
import java.util.ArrayList;

import java.util.Arrays; 
import java.util.Collections; 

// Consider making Friends static library since Listener is very similar
public class Friends {
	private Listener l;
	private ArrayList<Listener> friends = new ArrayList<Listener>();
	private int [] inCommon;

	public Friends(Listener l, UserID[] us) {
		this.l = l;

		for (UserID u : us) {
			this.friends.add(u);

		}
	}



	/**
	 * removes a friend given a listener
	 * 
	 * @param takes a listener l
	 */
	public void removeFriend(Listener l) throws FriendNotFoundException 
	{
	// if does not contain l throw exception
	    if (!this.friends.contains(l)) {
	        throw new FriendNotFoundException("Friend does not exist");
	}
		// else remove friends at l
	    else 
			this.friends.remove(l);
	}
	/**
	 * converts to a string
	 */
	public String toString() {
		// TODO
		return "";
	}
	/**
	 * Checks if listener is a friend
	 * 
	 * @param takes a listener l
	 * @return a boolean
	 */
	public boolean isFriend(Listener l) {
		// if l is contained return true else false
		if (this.friends.contains(l) == true) return true;
		else return false;
	}
	/**
	 * Checks friedns who like a given genre
	 * 
	 * @param takes a genre
	 * @return returns an array of listeners
	 */
	public ArrayList<Listener> friendsWhoLike(Genre g) {
		ArrayList<Listener> res = new ArrayList<Listener>();
		// add friends to array and return the array
		for (Listener f : friends) {
			if (f.likesGenre(g)) {
				res.add(f);
			}
		}
		return res;
	}
	/**
	 * Checks friends who like a given set of genres
	 * 
	 * @param takes a genre array
	 * @return returns an array of listeners
	 */
	public ArrayList<Listener> friendsWhoLike(Genre[] gs) {
		// Create duplicate of friends
		ArrayList<Listener> res = new ArrayList<Listener>(friends);
		
		// Go through each genre
		for (Genre g : gs) {
			// Get the friends who like this genre
			ArrayList<Listener> friendsWhoLikeG = friendsWhoLike(g);
			
			// Take the intersection with remaining friends
			res.retainAll(friendsWhoLikeG);
		}
		
		// The final intersection will be the friends who like all genres
		return res;
	}
	/**
	 * Checks friends who are most in common
	 * 
	 */
	public UserID friendMostInCommon() {
		Listener mostInCommon;
		int index = -1;
		int max;
		mostInCommon = this.friends.get(0);
		// for a listener in friends
		for (Listener f : this.friends) {
			int count = 0;
			index++;
			// increment array
			max = Arrays.stream(inCommon).max().getAsInt();
			// for genre in liked genres
			for (Genre g : this.l.likedGenres) {
				if (f.likesGenre(g)) {
					count++;
				}
			}
			// set incommon at index to count
			inCommon[index] = count;
			// if count is greater than max
			// set most in common to f
			if (count >= max) {
				mostInCommon = f;
			}
	
		}
		// return most in common use id
		return mostInCommon.getUserID();
	}
	/**
	 * Checks genres that are in common
	 * 
	 * @param takes a listener f
	 * @return returns an int
	 */
	public int genresInCommon(Listener f) {
		int count = 0;
		// f in is freind is true
		if (this.isFriend(f)) {
			// increent count
			for (Genre g : this.l.likedGenres) {
				if (f.likesGenre(g)) {
					count++;
				}
			}
		}
		else {
			System.out.print("This user is not a friend");
			return 0;
		}
		return count;

	}
	/**
	 * returns an array of user ids
	 * 
	 * @return returns an array of userids 
	 */
	public UserID[] sort() {
		HashMap<UserID, Integer> map = new HashMap<UserID, Integer>(); //UserID and genre in common
		ArrayList<Integer> notSortFriends = new ArrayList<Integer>(); //List of friends unsorted
		ArrayList<UserID> sortFriends = new ArrayList<UserID>(); //List of friends sorted
		
		for (Listener l : this.friends) { //Iterates through all listeners friend
			map.put(l.getUserID(), this.genresInCommon(l)); //Adds friend and # of common genres
			notSortFriends.add(this.genresInCommon(l)); //Adds # of common genres to list
		}
	
		Collections.sort(notSortFriends); //Sorts # of common genres in descending order
		for (int i : notSortFriends) { //For each # adds the corresponding friends UserID
			for (UserID x : map.keySet())
				if (i == map.get(x))
					sortFriends.add(x);
		}
		return (UserID[]) sortFriends.toArray(); //Returns array
			
				}

	public UserID searchClosest(Genre g) {

		return null;
	}

	public UserID searchClosest(Genre[] gs) {
		// TODO
		return null;
	}

	public boolean Friends(Friends fs) {
		// TODO
		return false;	
	}
}
