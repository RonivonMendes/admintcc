package scenario.cases;

import java.io.IOException;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

import config.Config;
import methods.Excel;
import test.Search;

public class CadastroAluno extends Search {


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
    public void toResemble()
    {
    	String output = null;
        try
        {	
            Search.CadastroAluno();
            output = Search.getResultCadastroAluno();
            Excel.toCompare(output, "CadastroAluno");
        } 
        catch(Exception ex)
        {
            output = ex.getMessage();
        }
      
    }

}
