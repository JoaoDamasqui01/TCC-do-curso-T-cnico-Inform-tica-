package dao;

import model.FormasPagamentos;

import javax.persistence.EntityManager;
import java.util.List;

public class FormasPagamentosDao {

    private static EntityManager em;

    public FormasPagamentosDao(EntityManager em){
        this.em = em;
    }

    public static List<FormasPagamentos> buscarTodos(){
        String jpql = "SELECT c FROM FormasPagamentos c";
        return em.createQuery(jpql,FormasPagamentos.class).getResultList();
    }

    public static FormasPagamentos buscarPorId(int idFormasPagmentos){
        return  em.find(FormasPagamentos.class, idFormasPagmentos);
    }
}
