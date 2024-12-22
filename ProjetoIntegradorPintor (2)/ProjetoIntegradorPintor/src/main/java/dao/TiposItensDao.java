package dao;

import model.Marcas;
import model.TiposItens;

import javax.persistence.EntityManager;
import java.util.List;

public class TiposItensDao {
    private static EntityManager em;

    public TiposItensDao (EntityManager em){
        this.em = em;
    }

    public static List<TiposItens> buscarTodos(){
        String jpql = "SELECT c FROM TiposItens c";
        return  em.createQuery(jpql,TiposItens.class).getResultList();
    }

    public static TiposItens buscarPorId(int idTiposItens){
        return em.find(TiposItens.class,idTiposItens);
    }


}
