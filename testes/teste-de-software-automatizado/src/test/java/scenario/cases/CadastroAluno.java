package scenario.cases;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

import config.Config;
import test.search;

public class CadastroAluno extends search {
	@SuppressWarnings("deprecation")
	@Test
	public  void main() throws InterruptedException {
		search.testeCadastroAluno();
	}
	
	@Before
	public void inicia(){
		String exePath ="driver\\chromedriver.exe";
		System.setProperty("webdriver.chrome.driver",exePath);
	}
	@After
	public void  encerra(){
		Config.driver.quit();
	}

}
