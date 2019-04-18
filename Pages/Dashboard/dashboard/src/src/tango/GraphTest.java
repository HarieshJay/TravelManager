/**
 * 
 */
package tango;

import static org.junit.Assert.*;

import java.io.File;
import java.util.List;

import org.junit.After;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Test;

/**
 * @author Stefan
 *
 */
public class GraphTest {
	String HU_edges = "data/HU_edges.csv";
	String HU_genres = "data/HU_genres.json";
	String HR_edges = "data/HR_edges.csv";
	String HR_genres = "data/HR_genres.json";
	String RO_edges = "data/RO_edges.csv";
	String RO_genres = "data/RO_genres.json";
	String genreSimilarity = "data/genreSimilarity.json";
	int HU_vertices = 47538;
	int HR_vertices = 54573;
	int RO_vertices = 41773;
	public Graph HU = new Graph(47538, HU_edges, HU_genres, genreSimilarity);
	public Graph HR = new Graph(54573, HR_edges, HR_genres, genreSimilarity);
	public Graph RO = new Graph(41773, RO_edges, RO_genres, genreSimilarity);

	/**
	 * @throws java.lang.Exception
	 */
	@Before
	public void setUp() throws Exception {
		System.out.println("Setting it up!");
	}
	
	@Test
	public void testGenres() throws Exception{
	
		assert(HU.genres(0) == HU.likedGenres[0]);
		System.out.print("Successful genres test for HU.\n");
		
		assert(HR.genres(0) == HR.likedGenres[0]);
		System.out.print("Successful genres test for HR.\n");
		
		assert(RO.genres(0) == RO.likedGenres[0]);
		System.out.print("Successful genres test for RO.\n");
	}
	
	@Test
	public void testVertices() throws Exception{
		assert(HU.V() == HU_vertices);
		System.out.print("Successful vertices test for HU.\n");
		assert(HR.V() == HR_vertices);
		System.out.print("Successful vertices test for HR.\n");
		assert(RO.V() == RO_vertices);
		System.out.print("Successful vertices test for RO.\n");
	}
	
	@Test
	public void testEdges() throws Exception{
		int HU_before = (HU.E());
		int HR_before = (HR.E());
		int RO_before = (RO.E());
		
		HU.addEdge(0, 1);
		HR.addEdge(0, 1);
		RO.addEdge(0, 1);
		
		assert(HU.E() == HU_before + 1);
		System.out.print("Successful addEdge test for HU.\n");
		assert(HR.E() == HR_before + 1);
		System.out.print("Successful addEdge test for HR.\n");
		assert(RO.E() == RO_before + 1);
		System.out.print("Successful addEdge test for RO.\n");
	}
	
	@Test
	public void testCompare() throws Exception{
		assert((Genre.similarityOfGenreLists(HU.likedGenres[0], HU.likedGenres[354]) > 
		Genre.similarityOfGenreLists(HU.likedGenres[0], HU.likedGenres[352])));
		assert(HU.compareUserAndFriends(0, 354, 352) == 1);
		System.out.print("Successful compare test for HU.\n");
		
		assert((Genre.similarityOfGenreLists(HR.likedGenres[11543], HR.likedGenres[27619]) > 
		Genre.similarityOfGenreLists(HR.likedGenres[11543], HR.likedGenres[2964])));
		assert(HR.compareUserAndFriends(11543, 27619, 2964) == 1);
		System.out.print("Successful compare test for HR.\n");
		
		assert((Genre.similarityOfGenreLists(RO.likedGenres[6], RO.likedGenres[2846]) > 
		Genre.similarityOfGenreLists(RO.likedGenres[6], RO.likedGenres[352])));
		assert(RO.compareUserAndFriends(6, 2846, 352) == 1);
		System.out.print("Successful compare test for RO.\n");
	}
	
	@Test
	public void testSort() throws Exception{
		HU.addEdge(0, 354);
		List<Integer> HU_sorted = HU.sortByHowSimilar(0);
		assert(HU_sorted.get(HU_sorted.size() - 1) == 354);
		assert(HU.friendMostInCommon(0) == 354);
		System.out.print("Successful sort test for HU.\n");
		
		HR.addEdge(11543, 27619);
		List<Integer> HR_sorted = HR.sortByHowSimilar(11543);
		assert(HR_sorted.get(HR_sorted.size() - 1) == 27619);
		assert(HR.friendMostInCommon(11543) == 27619);
		System.out.print("Successful sort test for HR.\n");
		
		RO.addEdge(6, 2846);
		List<Integer> RO_sorted = RO.sortByHowSimilar(6);
		assert(RO_sorted.get(RO_sorted.size() - 1) == 2846);
		assert(RO.friendMostInCommon(6) == 2846);
		System.out.print("Successful sort test for RO.\n");
	}
	
	
	
	
	
	

	/**
	 * @throws java.lang.Exception
	 */
	@After
	public void tearDown() throws Exception {
		
		
	}


}
