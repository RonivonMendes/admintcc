package scenario.cases;

import java.io.IOException;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

import config.Config;
import methods.Excel;
import test.Search;


public class CT03 extends Search {
	


	
	@Before
	public void inicia(){
		String exePath ="driver\\chromedriver.exe";
		System.setProperty("webdriver.chrome.driver",exePath);
	}
	@After
	public void  encerra(){
		Config.driver.quit();
	}
	@Test
    public void toResemble(){
   
	    	String output = null;
	        try
	        {	
	            Search.CT03();
	            output = Search.getResultCT03();
	            Excel.toCompare(output, CT03.class.getName().toString());
	        } 
	        catch(Exception ex)
	        {
	            output = ex.getMessage();
	        }
	      
	    
    }
}
