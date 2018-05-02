package scenario.cases;

import java.io.IOException;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

import config.Config;
import methods.Excel;
import test.Search;


public class CadastroSupervisor  {
	

	
	@Before
	public void inicia(){
		String exePath ="driver//chromedriver.exe";
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
            Search.CadastroSupervisor();
            output = Search.getResultCadastroSupervisor();
            Excel.toCompare(output, CadastroSupervisor.class.getName().toString());
        } 
        catch(Exception ex)
        {
            output = ex.getMessage();
        }
      
    }

}

