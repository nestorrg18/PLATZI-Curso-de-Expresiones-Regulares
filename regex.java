import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;

public  class regex{

    public static void main(String[] args){
        String file = "../results.csv";

        try{
            BufferedReader br = new BufferedReader(new FileReader(file));
            String line;
            while((line = br.readLine()) != null){
                System.out.println(line);
            }
        }catch(Exception e){
            System.out.println("nope!");
        }
    }
}