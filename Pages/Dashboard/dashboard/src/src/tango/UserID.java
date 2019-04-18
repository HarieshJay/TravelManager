package tango;

public class UserID {
	private int u;
	/**
	 * Creates a user id
	 * 
	 * @param takes a strinf
	 * @throws NumberFormatException
	 */
	public UserID(String s) {
		// try to parse an int froma string
		try {
			int i = Integer.parseInt(s);
			// if you can set the user id
			if (i >= 0) this.u = i;
			// throw exception if not a natural number
			else throw new NumberFormatException("UserID must be a natural number.");
		}
		// else throw an exception
		catch (NumberFormatException e) {
			throw new NumberFormatException("UserID must be a whole number.");
		}
	}
	/**
	 * converts userid to an int
	 * 
	 * @return returns an int
	 */
	public int toInt() {
		// returns the user id
		return this.u;
	}
	/**
	 * checks if user ids are equal
	 * 
	 * @param takes a user id
	 * @return returns a boolean
	 */
	public boolean equals(UserID u) {
		// check if user ids are equal
		// return true
		if (this.u == u.toInt()) return true;
		//else return false
		else return false;
	}
	// main function
	public static void main(String args[]) {
		UserID x = new UserID("45");
		System.out.println(x.toInt());
	}
}
