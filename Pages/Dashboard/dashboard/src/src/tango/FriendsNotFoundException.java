package tango;
import tango.UserID;

// supress warning for friends not found exception
@SuppressWarnings("serial")
class FriendNotFoundException extends Exception
{
  public FriendNotFoundException(String message)
  {
    super(message);
  }
}



