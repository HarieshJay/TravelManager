package tango;
// supress warning for no friends in common exception
@SuppressWarnings("serial")
public class NoFriendInCommonException extends Exception {
	public NoFriendInCommonException(String errorMessage) {
		super(errorMessage);
	}
}
