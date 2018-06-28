package scenario.cases;

import java.io.IOException;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

import config.Config;
import methods.Excel;
import test.Search;


public class CT04 extends Search {
	


	
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
	            Search.CT04();
	            output = Search.getResultCT04();
	            Excel.toCompare(output, CT03.class.getName().toString());
	        } 
	        catch(Exception ex)
	        {
	            output = ex.getMessage();
	        }
	      
	    
    }
}
