package dao;

import model.Entregas;

import javax.persistence .EntityManager;
import java.util.List;

public class EntregasDao {
    private static EntityManager em;

    public EntregasDao (EntityManager em){
        this.em = em;
    }

    public void cadastrar(Entregas entregas){
        this.em.persist(entregas);
    }

    public static List<Entregas> buscarTodos(){
        String jpql = "SELECT c FROM Entregas c";
        return em.createQuery(jpql,Entregas.class).getResultList();
    }

    public static Entregas buscarPorId(int idEntregas){
        return  em.find(Entregas.class, idEntregas);
    }

    public void excluir(Entregas entregas){
        em.merge(entregas);
        this.em.remove(entregas);
    }

}

